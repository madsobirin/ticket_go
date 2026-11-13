<?php

namespace App\Auth;

use App\Models\Admin;
use App\Models\Member;
use App\Models\OperatorLoket;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;

class MultiActorUserProvider implements UserProvider
{
    /**
     * Retrieve a user by their unique identifier.
     */
    public function retrieveById($identifier): ?Authenticatable
    {
        if (! $identifier) {
            return null;
        }

        if (is_string($identifier)) {
            if (str_starts_with($identifier, 'member:')) {
                return Member::find(substr($identifier, 7));
            }
            if (str_starts_with($identifier, 'operator:')) {
                return OperatorLoket::find(substr($identifier, 9));
            }
            if (str_starts_with($identifier, 'admin:')) {
                return Admin::find(substr($identifier, 6));
            }
        }

        return Member::find($identifier)
            ?? OperatorLoket::find($identifier)
            ?? Admin::find($identifier);
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     */
    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        $user = $this->retrieveById($identifier);

        if (! $user) {
            return null;
        }

        $rememberToken = $user->getRememberToken();

        return $rememberToken && hash_equals($rememberToken, $token) ? $user : null;
    }

    /**
     * Update the "remember me" token for the given user in storage.
     */
    public function updateRememberToken(Authenticatable $user, $token): void
    {
        $user->setRememberToken($token);
        if (method_exists($user, 'save')) {
            $user->save();
        }
    }

    /**
     * Retrieve a user by the given credentials.
     */
    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        $loginInput = $credentials['username'] ?? $credentials['email'] ?? $credentials['user'] ?? null;

        if (! $loginInput) {
            return null;
        }

        // 1. Cek Member berdasarkan username
        $member = Member::where('username', $loginInput)->first();
        if ($member) {
            return $member;
        }

        // 2. Cek Operator Loket berdasarkan user
        $operator = OperatorLoket::where('user', $loginInput)->first();
        if ($operator) {
            return $operator;
        }

        // 3. Cek Admin berdasarkan email atau alias 'admin'
        if ($loginInput === 'admin') {
            $admin = Admin::first();
            if ($admin) {
                return $admin;
            }
        }

        $admin = Admin::where('email', $loginInput)->first();
        if ($admin) {
            return $admin;
        }

        return null;
    }

    /**
     * Validate a user against the given credentials.
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        $plain = $credentials['password'] ?? '';

        return Hash::check($plain, $user->getAuthPassword());
    }

    /**
     * Rehash the user's password if required and supported.
     */
    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false): void
    {
        // No-op for now
    }
}

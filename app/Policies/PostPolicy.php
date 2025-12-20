<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * 🚨 Admin bisa melakukan SEMUA aksi
     * return null → lanjut ke method policy lain
     */
    public function before(User $user): ?bool
    {
        return $user->role === 'admin' ? true : null;
    }

    /**
     * User boleh melihat daftar post
     * (akan tetap difilter oleh Resource query)
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * User hanya boleh melihat post miliknya
     */
    public function view(User $user, Post $post): bool
    {
        return $post->user_id === $user->id;
    }

    /**
     * User boleh membuat post
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * 🔒 User hanya boleh update post miliknya
     */
    public function update(User $user, Post $post): bool
    {
        return $post->user_id === $user->id;
    }

    /**
     * 🔒 User hanya boleh menghapus post miliknya
     */
    public function delete(User $user, Post $post): bool
    {
        return $post->user_id === $user->id;
    }

    /**
     * Restore (jika pakai soft delete)
     */
    public function restore(User $user, Post $post): bool
    {
        return $post->user_id === $user->id;
    }

    /**
     * Force delete (opsional)
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return false;
    }
}

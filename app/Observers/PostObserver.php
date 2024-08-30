<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    // public function created(Post $post): void
    // {
    //     //
    // }

    /**
     * Handle the Post "updated" event.
     */
    // public function updated(Post $post): void
    // {
    //     //
    // }

    /**
     * Handle the Post "deleted" event.
     */
    // public function deleted(Post $post): void
    // {
    //     //
    // }

    /**
     * Handle the Post "restored" event.
     */
    // public function restored(Post $post): void
    // {
    //     //
    // }

    /**
     * Handle the Post "force deleted" event.
     */
    // public function forceDeleted(Post $post): void
    // {
    //     //
    // }

    public function retrieved(Post $post)
    {
        // Increment the view count when the post is retrieved (viewed)

        // dd("i am here");
        $post->increment('view_count');

        // Save the updated view count
        $post->saveQuietly();
    }
}

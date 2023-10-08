<?php

declare(strict_types=1);

namespace App\Mail\Posts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Domain\Blogging\ValueObjects\PostValueObject;

class NewPost extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public PostValueObject $object
    ) {}

    public function envelope() : Envelope
    {
        return new Envelope(
            subject: 'New Post',
        );
    }

    public function content() : Content
    {
        return new Content(
            markdown: 'emails.posts.new-post',
        );
    }

    public function attachments() : array
    {
        return [];
    }
}

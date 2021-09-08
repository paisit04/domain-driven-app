<?php

namespace App\Jobs;

use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Bus\Queueable;

class SaveUploadedFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filename;
    protected $upload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename, File $upload)
    {
        $this->filename = $filename;
        $this->upload = $upload;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $filename = $this->filename;
        $file = $this->upload;

        $extension = $file->getClientOriginalExtension();
        $saveAs = $filename . "." . $extension;
        $file->storeAs('uploads', $saveAs, 'local');
        return $saveAs;
    }
}

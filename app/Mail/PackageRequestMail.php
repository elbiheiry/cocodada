<?php

namespace App\Mail;

use App\Models\PackageRequest as ModelsPackageRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PackageRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModelsPackageRequest $packageRequest , $projects ,$total)
    {
        //
        $this->request = $packageRequest;
        $this->projects = $projects;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.email.package' , ['request' => $this->request , 'projects' => $this->projects ,'total' => $this->total])
            ->subject('New package request')
            ->from($this->request->email , $this->request->name);
    }
}

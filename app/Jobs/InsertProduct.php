<?php

namespace App\Jobs;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
class InsertProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
     
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $datas = [
            ['name'=>'Coder 1', 'email'=>'hemant.s.f123@gmail.com'],
            ['name'=>'Coder 2', 'email'=>'vasot38920@gearstag.com']
        ];
        foreach ($datas as $key => $data) {
            Mail::send('emails.welcome', ['user' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name'])->subject('Welcome to My Website');
            });
        }   
    }
}

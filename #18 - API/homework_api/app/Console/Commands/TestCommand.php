<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        
        $data = Http::get('https://reqres.in/api/users/2')->json()['data'];
        $res = Http::post('https://reqres.in/api/create',['name'=>'John','job'=>'Software Enginner']);
        dd($res->body());
    }
}

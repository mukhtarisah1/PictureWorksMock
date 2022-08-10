<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Validator;
use App\Models\User;

class PostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is for posting user data to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
   

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->ask('ID');
        $comments = $this->ask('Comments');

        $validator= Validator::make([
            'Id'=>$id,
            'comments'=>$comments,
        ],
        [
            'Id'=>'required|numeric',
            'comments'=>'required|string',
        ]);
        if($validator->fails()){
            $this->info('action not completed see error messages below');
            foreach($validator->errors()->all() as $error){
                $this->error($error);
            }
            return 1;
        }
        
        $user = User::find($id);
        if($user){
          
          $user->comments .= $comments.PHP_EOL;
          $user->save();
          echo 'OK';
        }
        return 1;

    }
}

<?php
namespace busplannersystem\Console\Commands;
 
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
 
class UserStatistics extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'advertisement:company';
 
  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Update the banner image slow in blade view based on timing';
 
  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }
 
  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {



    // calculate new statistics
    $advertisements = DB::table('advertisements')
      ->select('advertisement_id', DB::raw('count(*) as total_posts'))
      ->groupBy('user_id')
      ->get();


    $advertisements=Advertisement::all()->get();
     
    // update statistics table
    foreach($posts as $post)
    {
      DB::table('users_statistics')
      ->where('user_id', $post->user_id)
      ->update(['total_posts' => $post->total_posts]);
    }
  }
}
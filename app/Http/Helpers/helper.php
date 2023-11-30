<?php

use App\Models\Notification;
use App\Models\BarangayPosition;
use App\Models\Services as ModelsServices;
use Carbon\Carbon;

class Helper
{

  public static function getServices()
  {
    return ModelsServices::get();
  }
  public static function getPositions()
  {
    return BarangayPosition::get();
  }
  public static function timeForHumans($date)
  {
    $result = Carbon::parse($date)->diffForHumans();
    return $result;
  }
  public static function seenNotification($notification_id)
  {
    if ($notification_id != null) {
      $notification = Notification::findOrFail($notification_id);
      $notification->seen = 1;
      $notification->save();
    }
  }
}

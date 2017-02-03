<?php defined('BASEPATH') OR exit('No direct script access allowed');

class  Notifications
{
    // TODO: Implement the database model.
    // TODO: Create the reciever relation.
    // TODO: Set up reference document
    // TODO: Implement copyright docblock.
    // TODO: Set mark as read all to the view.

    /**
     * Variable for the codeigniter instance.
     *
     * @return CI instance.
     */
    protected $CI;

    /**
     * Get the notification data for the navbar. (max. 3)
     *
     * @param  int|null    $userId  The id for the given user.
     * @return Collection  $data
     */
    public function dataNavbar($userId = null)
    {
        $data = Notify::with(['creator'])->where('is_read', 'N')->where('deliver_id', $userId)->take(3)->get();
        return $data;
    }

    /**
     * Count all the notifications in the table for the given user.
     *
     * @param  int|null  $userId  The id form the given user.
     * @return int       $count
     */
    public function allNotificationsCount($userId = null)
    {
        $count = Notify::where('is_read', 'N')->where('deliver_id', $userId)->count();
        return $count;
    }

    /**
     * Create a new notification in the database.
     *
     * @param  array $data. The data that's need to be inserted.
     * @return bool
     */
    public function createNotification($data)
    {
        return (Notify::create($data)) ? true : false;
    }

    /**
     * Get all the unread notications.
     *
     * @param  int|null   $userId  The id from the given user.
     * @return Collection $data
     */
    public function UnreadNotifications($userId = null)
    {

    }

    /**
     * Set an unread notification as read.
     *
     * @param  int|null $notificationId  The id off the given notication.
     * @return bool
     */
    public function markAsRead($notificationId = null)
    {
        return (Notify::find($notificationId)->update(['is_read' => 'Y'])) ? true : false;
    }

    /**
     * Mark all unread notification as read.
     *
     * @param  int|null $userId  The id from the given user.
     * @return void
     */
    public function markAsReadAll($userid = null)
    {

    }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class  Notifications
{
    // TODO: Implement database. DB LINT: |id|creator_id|user_id|is_read|message|link|created_at|updated_at|deleted_at|
    // TODO: Register the library to the autoload.
    // TODO: Implement the database model.
    // TODO: Create the creator and reciever relation.
    // TODO: Set up reference document
    // TODO: Implement copyright docblock.
    // TODO: Implement library in the view.
    // TODO: Set mark as read all to the view. 

    /**
     * Variable for the codeigniter instance.
     *
     * @return CI instance.
     */
    protected $CI;

    /**
     * Notifications constructor.
     *
     * @param  array $config The library config.
     * @return void
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->CI =& get_instance();
    }

    /**
     * Get the notification data for the navbar. (max. 3)
     *
     * @param  int|null    $userId  The id for the given user.
     * @return Collection  $data
     */
    public function dataNavbar($userId = null)
    {
        $data = Notify::with(['creator'])->where('is_read', 'N')->where('user_id', $userId)->take(3)->get();
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
        $count = Notify::where('is_read', 'N')->where('user_id', $userId)->count();
        return $count;
    }

    /**
     * Create a new notification in the database.
     *
     * @param  array $data. The data that's need to be inserted.
     * @return bool
     */
    public function createNotification()
    {

    }

    public function UnreadNotifications()
    {

    }

    public function markAsRead()
    {

    }
}

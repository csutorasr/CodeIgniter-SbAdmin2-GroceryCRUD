<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends MY_Model {

	private $maxCount = 3;

	function __construct()
    {
        parent::__construct();
    }

	public $count;
	public $notifications;

	public function getCommonData()
	{
		$this->db->where('user_id', $this->auth_user_id);
		$this->db->where('seen', '0');
		$this->count = $this->db->count_all_results('user_notifications');
		$this->db->where('user_id', $this->auth_user_id);
		$this->db->where('seen', '0');
		$this->db->order_by('created_date DESC');
		$this->db->limit($this->maxCount);
		$this->db->select('id, text, created_date, link, icon, color');
		$this->notifications = $this->db->get('user_notifications')->result();
	}

	public function get($id)
	{
		$this->db->where('id', $id);
		$this->db->where('user_id', $this->auth_user_id);
		$this->db->limit(1);
		$this->db->select('id, text, created_date, link, icon, color, seen');
		$data = $this->db->get('user_notifications')->row();
		if ($data !== null && $data->seen === '0')
		{
			$this->db->where('id', $id);
			$this->db->set('seen', '1');
			$this->db->update('user_notifications');
		}
		return $data;
	}

	public function getList()
	{
		$this->db->where('user_id', $this->auth_user_id);
		$this->db->limit(10);
		$this->db->order_by('created_date DESC');
		$this->db->select('id, text, created_date, link, icon, color, seen');
		return $this->db->get('user_notifications')->result();
	}

	public function add($text, $link, $icon = 'info', $color = 'primary', $user_id = null)
	{
		$this->db->insert('user_notifications', [
			'text' => $text,
			'link' => $link,
			'icon' => $icon,
			'color' => $color,
			'user_id' => $user_id ?: $this->auth_user_id,
		]);
	}

	public function getCountString()
	{
		return ($this->count > $this->maxCount) ? $this->maxCount."+" : $this->count;
	}

}

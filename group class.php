<?php
include("db_functions.php");
class Group{
    private $groupID = -16; 
	private $groupName = "";
		
	public static function createNewGroup($groupID, $groupName) {

		$newGroup = new Group();
		$newGroup->groupName = $groupName;
		$newGroup->groupID = $groupID;
		
		$newGroup->groupID = create_group($groupID, $groupName);

		return $newGroup;
	}

	public static function retrieveGroup($groupID) {
		
		$newGroup = new Group();

		$newGroup->groupID = $groupID;

		$details = get_group_details_from_id($groupID);
		$newGroup->groupName = $details["groupName"];

		return $newGroup;
	}
	
	//	Returns a list of userIDs for users in the group.
    public function getUsers() {
    	return get_users_from_group($this->groupID);
	}

	//	Get polls for group
	public function getPolls() {
		return get_polls_for_group($this->groupID);
	}

	// get name of group
	public function name() {
		return $this->groupName;
	}


}
?>

<?php
defined('C5_EXECUTE') or die("Access Denied.");
use \Concrete\Core\Permission\Access\Entity\Entity as PermissionAccessEntity;
use \Concrete\Core\Permission\Duration as PermissionDuration;
use \Concrete\Core\Workflow\Workflow as Workflow;

if ($_REQUEST['cnvID'] > 0) {
	$conversation = Conversation::getByID($_REQUEST['cnvID']);
}
$cnp = new Permissions($conversation);
if ($cnp->canEditConversationPermissions()) {

	if ($_REQUEST['task'] == 'add_access_entity' && Loader::helper("validation/token")->validate('add_access_entity')) {
		$pk = PermissionKey::getByID($_REQUEST['pkID']);
		$pk->setPermissionObject($conversation);
		$pa = PermissionAccess::getByID($_REQUEST['paID'], $pk);
		$pe = PermissionAccessEntity::getByID($_REQUEST['peID']);
		$pd = PermissionDuration::getByID($_REQUEST['pdID']);
		$pa->addListItem($pe, $pd, $_REQUEST['accessType']);
	}

	if ($_REQUEST['task'] == 'remove_access_entity' && Loader::helper("validation/token")->validate('remove_access_entity')) {
		$pk = PermissionKey::getByID($_REQUEST['pkID']);
        $pk->setPermissionObject($conversation);
		$pa = PermissionAccess::getByID($_REQUEST['paID'], $pk);
		$pe = PermissionAccessEntity::getByID($_REQUEST['peID']);
		$pa->removeListItem($pe);
	}

	if ($_REQUEST['task'] == 'save_permission' && Loader::helper("validation/token")->validate('save_permission')) {
		$pk = PermissionKey::getByID($_REQUEST['pkID']);
        $pk->setPermissionObject($conversation);
		$pa = PermissionAccess::getByID($_REQUEST['paID'], $pk);
		$pa->save($_POST);
	}

	if ($_REQUEST['task'] == 'display_access_cell' && Loader::helper("validation/token")->validate('display_access_cell')) {
		$pk = PermissionKey::getByID($_REQUEST['pkID']);
		$pk->setPermissionObject($fs);
		$pa = PermissionAccess::getByID($_REQUEST['paID'], $pk);
		Loader::element('permission/labels', array('pk' => $pk, 'pa' => $pa));
	}

	if ($_REQUEST['task'] == 'save_permission_assignments' && Loader::helper("validation/token")->validate('save_permission_assignments')) {
		$permissions = PermissionKey::getList('file_set');
		foreach($permissions as $pk) {
			$paID = $_POST['pkID'][$pk->getPermissionKeyID()];
            $pk->setPermissionObject($conversation);
			$pk->clearPermissionAssignment();
			if ($paID > 0) {
				$pa = PermissionAccess::getByID($paID, $pk);
				if (is_object($pa)) {
					$pk->assignPermissionAccess($pa);
				}			
			}
		}
	}

}

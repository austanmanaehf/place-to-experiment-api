<?php

use PHPUnit\Framework\TestCase;


class TeamTest extends TestCase
{

    public function testAddMember ()
    {

        $team = new Karolina\Team\Team();
        $userA = new \Karolina\User\User(123, 'example@example.com', 'Arnar', 'Sigurdsson');
        $userB = new \Karolina\User\User(321, 'example@example.com', 'John', 'Smith');

        $team->addMember($userA);

        $this->assertEquals(true, $team->isInTeam($userA));
        $this->assertEquals(false, $team->isInTeam($userB));

    }

    public function testRole ()
    {

        $team = new Karolina\Team\Team();
        $user = new \Karolina\User\User(123, 'example@example.com', 'Arnar', 'Sigurdsson');
        $userNotInTeam = new \Karolina\User\User(321, 'john@example.com', 'John', 'Smith');

        $team->addMember($user, ['editor', 'owner', 'guest']);

        $this->assertEquals(true, $team->hasRole($user, 'editor'));
        $this->assertEquals(false, $team->hasRole($user, 'painter'));
        $this->assertEquals(false, $team->hasRole($userNotInTeam, 'editor'));

    }

    public function testGetMembers ()
	{
		$team = new Karolina\Team\Team();
		$userA = new \Karolina\User\User(123, 'example@example.com', 'Arnar', 'Sigurdsson');
		$userB = new \Karolina\User\User(321, 'example2@example.com', 'John', 'Smith');

		$team->addMember($userA);
		$team->addMember($userB);

		$myTeam = $team->getMembers();

		$this->assertEquals(2, count($myTeam));

		$this->assertEquals($userA->getEmail(), $myTeam['123']['user']->getEmail());

	}

	public function testGetMembersEmails ()
	{
		$team = new Karolina\Team\Team();
		$userA = new \Karolina\User\User(123, 'example@example.com', 'Arnar', 'Sigurdsson');
		$userB = new \Karolina\User\User(321, 'example2@example.com', 'John', 'Smith');

		$team->addMember($userA);
		$team->addMember($userB);

		$membersEmails = $team->getMembersEmails();

		$this->assertEquals($userA->getEmail(), $membersEmails[0]);
		$this->assertEquals($userB->getEmail(), $membersEmails[1]);
	}

}

<?php

namespace App\Presenters;

use App\Model\Entities\User as UserEntity;
use App\Model\Facades\UserFacade;
use Nette\Application\UI\Presenter;
use Nette\Bridges\ApplicationLatte\Template;
namespace App\Model\Security\IPasswordHasher;

abstract class BasePresenter extends Presenter
{

    /**
     * @var UserFacade 
     * @inject
     */
    public $userFacade;

    /**
     * @var IPasswordHasher
     * @inject 
     */
    public $passwordHasher;
    
    /**
     * @var UserEntity
     */
    protected $userEntity;
    
    public function startup() {
        parent::startup();
        if ($this->getUser()->isLoggedIn()) {
            $this->userEntity = $this->userFacade->getUser($this->getUser()->getId());
        }
        if (!isset($this->userEntity)) {
            $userEntity = new UserEntity($this->passwordHasher);
            $userEntity->setUserRoleGuest();
            $this->userEntity = $userEntity;
        }
    }
    
    public function beforeRender() {
        parent::beforeRender();
        $this->template->userEntity = $this->userEntity;
    }
    
}

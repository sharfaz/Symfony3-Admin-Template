<?php

namespace SalexUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SalexUserBundle extends Bundle
{
	//get parent FOSUserbundle
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}


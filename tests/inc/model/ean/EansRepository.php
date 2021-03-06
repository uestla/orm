<?php

namespace NextrasTests\Orm;

use Nextras\Orm\Repository\Repository;


/**
 * @method Ean|NULL getById($id)
 */
final class EansRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [Ean::class];
	}
}

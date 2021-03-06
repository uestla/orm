<?php declare(strict_types=1);

/**
 * This file is part of the Nextras\Orm library.
 * @license    MIT
 * @link       https://github.com/nextras/orm
 */

namespace Nextras\Orm\Mapper;

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Entity\IEntity;
use Nextras\Orm\Entity\Reflection\PropertyMetadata;
use Nextras\Orm\Repository\IRepository;
use Nextras\Orm\StorageReflection\IStorageReflection;
use stdClass;


interface IMapper
{
	/**
	 * Returns all entities.
	 */
	public function findAll(): ICollection;


	/**
	 * Transforms value from mapper, which is not a collection.
	 * @param  mixed $data
	 */
	public function toCollection($data): ICollection;


	/**
	 * Returns cache object for collections.
	 */
	public function getCollectionCache(): stdClass;


	/**
	 * Clears cache object for collection.
	 */
	public function clearCollectionCache();


	/**
	 * Creates collection with HasOne mapper.
	 */
	public function createCollectionManyHasOne(PropertyMetadata $metadata, IEntity $parent): ICollection;


	/**
	 * Creates collection with OneHasOneDirected mapper.
	 */
	public function createCollectionOneHasOne(PropertyMetadata $metadata, IEntity $parent): ICollection;


	/**
	 * Creates collection with ManyHasMany mapper.
	 */
	public function createCollectionManyHasMany(IMapper $mapper, PropertyMetadata $metadata, IEntity $parent): ICollection;


	/**
	 * Creates collection with OneHasMany mapper.
	 */
	public function createCollectionOneHasMany(PropertyMetadata $metadata, IEntity $parent): ICollection;


	public function setRepository(IRepository $repository);


	public function getRepository(): IRepository;


	public function getTableName(): string;


	public function getStorageReflection(): IStorageReflection;


	/**
	 * @see IRepository::persist()
	 */
	public function persist(IEntity $entity);


	/**
	 * @see IRepository::remove()
	 */
	public function remove(IEntity $entity);


	/**
	 * @see IRepository::flush()
	 * @return void
	 */
	public function flush();


	/**
	 * @see IRepository::roolback()
	 * @return void
	 */
	public function rollback();
}

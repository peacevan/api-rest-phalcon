<?php

namespace App\Services;

use App\Models\Products;
use Exception;
/**
 * Business-logic for users
 *
 * Class UsersService
 */
class ProductsService extends AbstractService
{
	/** Unable to create user */
	const ERROR_UNABLE_CREATE_USER = 11001;

	/** User not found */
	const ERROR_USER_NOT_FOUND = 11002;

	/** No such user */
	const ERROR_INCORRECT_USER = 11003;

	/** Unable to update user */
	const ERROR_UNABLE_UPDATE_USER = 11004;

	/** Unable to delete user */
	const ERROR_UNABLE_DELETE_USER = 1105;
	/**
	 * Creating a new user
	 *
	 * @param array $userData
	 */
	public function createProduct(array $productData)
	{
		try {
			
			$product = new Products();
			$product->setTenantId($productData['tenantId']);
			$product->setUuid($productData['uuid']);
			$product->setFlag($productData['flag']);
			$product->setImage($productData['image']);
			$product->setPrice($productData['price']);
			$product->setDescription($productData['description']);
			$product->setTitle($productData['title']);
		 
        	$result = $product->save();
			
			if (false === $result) {
				foreach ($product->getMessages() as $message) {
					$error[] = (string) $message;
				}
				$output = count($error) > 1 ? json_encode($error) : $error[0];
				throw new ServiceException($output, self::ERROR_UNABLE_CREATE_USER);
			}

		} catch (\PDOException $e) {
		
		  throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}
	/**
	 * Updating an existing user
	 *
	 * @param array $userData
	 */
	public function updateProduct(array $productData)
	{
		try {
			$product = Products::findFirst(
				[
					'conditions' => 'id = :id:',
					'bind'       => [
						'id' => $productData['id']
					]
				]
			);
			$productData['tenantId'] =(is_null(@$productData['tenantId'])) ? $product->getTenantId() : @$productData['tenantId'];
			$productData['uuid'] =(is_null(@$productData['uuid'])) ? $product->getUuid() : @$productData['uuid'];
			$productData['flag'] =(is_null(@$productData['flag'])) ? $product->getFlag() : @$productData['flag'];
			$productData['image'] =(is_null(@$productData['image'])) ? $product->getImage() : @$productData['image'];
			$productData['price'] =(is_null(@$productData['price'])) ? $product->getPrice() : @$productData['price'];
			$productData['tile'] =(is_null(@$productData['tile'])) ? $product->getPrice() : @$productData['tile'];
			$productData['description'] =(is_null(@$productData['description'])) ? $product->getDescription() : @$productData['description'];
			
            $date = new \DateTime();
            $dateString = $date->format('Y-m-d H:i:s');
			$result = $product->setTenantId($productData['tenantId'])
			               ->setid($productData['id'])
			               ->setUuid($productData['uuid'])
						   ->setFlag($productData['flag'])
			               ->setImage($productData['image'])
			               ->setPrice($productData['price'])
			               ->setPrice($productData['title'])
			               ->setDescription($productData['description'])
			               ->setUpdatedAt($dateString)
			               ->update();
	
	
			if (false === $result) {
				foreach ($product->getMessages() as $message) {
					$error[] = (string) $message;
				}
				$output = count($error) > 1 ? json_encode($error) : $error[0];
				throw new \Exception($output);
			}
  
		} catch (Exception $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * Delete an existing user
	 *
	 * @param int $userId
	 */
	public function deleteProduct($productId)
	{
		try {
			$product = Products::findFirst(
				[
					'conditions' => 'id = :id:',
					'bind'       => [
						'id' => $productId
					]
				]
			);

			if (!$product) {
				throw new Exception("Product not found", self::ERROR_USER_NOT_FOUND);
			}
			$result = $product->delete();
			if (!$result) {
				return ["error" => "Product not found","success" => false];	
				//throw new ServiceException('Unable to delete product', self::ERROR_UNABLE_DELETE_USER);
			}
			return ["success" => true,"result" => $result];	

		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(),$e);
		}
	}
	/**
	 * Returns product list
	 *
	 * @return array
	 */
	public function getProductsList()
	{
		
		try {
			$products = Products::findProducts(
				[
					'conditions' => '',
					'bind'       => [],
					'columns'    => "id, description, title, price",
				]
			);
		
			if (!$products) {
				return [];
			}

			return $products->toArray();
		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}
   
	public function findProductById($productId)
	{
		try {
			$product = Products::findFirst(
				[
					'conditions' => 'id = :id:',
					'bind'       => [
				        'id' => $productId
					]
				]
			);
			return $product->toArray();
			if (!$product) {
				return ["error" => "Product not found","success" => false];	
			}
		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}
}

<?php 
declare(strict_types=1);

 use App\Services\ProductsService;
 use App\Library\Util;
 use Phalcon\Http\Response;

 Class ProductController extends AbstractController {
     
     protected $productService;
     protected $response;
    public function __construct(){
        $this->productService = $this->getDI()->get('ProductsService');
        $this->response       = $this->getDI()->get('response');
        
    }
    public function indexAction() {
       // echo "Hello World";
       $response    = $this->listAction();
       return $response->send();
 	}
    public function listAction(){
        $productList=null;
        try {
           $productService = $this->getDI()->get('ProductsService');
           $response       = $this->getDI()->get('response');
           $productList =  $productService->getProductsList();
        } catch (Exception $e) {
            $response->setStatusCode(500,'Internal Server Error')->send();
        }
        return $response->setJsonContent($productList);
    }
    public function findAction($id)
    {
        $productList=null;
        try {
           $this->productService = $this->getDI()->get('ProductsService');
           $this->response       = $this->getDI()->get('response');
           $productList =  $this->productService->findProductById($id);
        } catch (Exception $e) {
            $this->response->setStatusCode(500,'Internal Server Error')->send();
        }
        return $this->response->setJsonContent($productList)->send();
     
    }
     
	public function updateAction($id)
	{
        try {
            $requestData=$this->request->getPut();
           
          
            $result=$this->productService->updateProduct($requestData);
           } catch (Exception $e) {
               $this->response->setStatusCode(500,'Internal Server Error'.$e->getMessage())->send();
           }
           return $this->response->setJsonContent($result)->send();
	} 
	public function removeAction($id)
	{
        try {
         $result=$this->productService->deleteProduct($id);
        } catch (Exception $e) {
            $this->response->setStatusCode(500,'Internal Server Error'.$e->getMessage())->send();
        }
        return $this->response->setJsonContent($result)->send();
	}
    public function createAction()
	{
         $result=null;
         try {
         $requestData=$this->request->getPut();
         $result=$this->productService->createProduct($requestData);
        
        } catch (Exception $e) {
            $this->response->setStatusCode(500,'Internal Server Error'.$e->getMessage())->send();
        }
        return $this->response->setJsonContent($result)->send();
	}

    
 }
 
  
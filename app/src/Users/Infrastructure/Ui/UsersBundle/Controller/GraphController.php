<?php

namespace Misa\Users\Infrastructure\Ui\UsersBundle\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GraphController
{
    /**
     * @var bool
     */
    private $shouldHandleCORS;

    public function __construct() {
        $this->shouldHandleCORS = false;
    }

    /**
     * @Route("/", name="graph_end_point")
     * @Method({"POST","GET","OPTIONS"})
     * @param Request $request
     * @return Response
     */
    public function endpointAction(Request $request)
    {
        return $this->process($request,null);
    }

    /**
     * @Route("/{schemaName}", name="graph_schema")
     * @Method({"POST","GET","OPTIONS"})
     * @param Request $request
     * @param $schemaName
     * @return Response
     */
    public function endpointSchemaAction(Request $request, $schemaName)
    {
        return $this->process($request,$schemaName);
    }

    private function process(Request $request, $schemaName)
    {
        if ('OPTIONS' === $request->getMethod()) {
            $response = new Response('', 200);
        } else {
            $payload = $this->processNormalQuery($request, $schemaName);
            $response = new JsonResponse($payload, 200);
        }
        if ($this->shouldHandleCORS && $request->headers->has('Origin')) {
            $response->headers->set('Access-Control-Allow-Origin', $request->headers->get('Origin'), true);
            $response->headers->set('Access-Control-Allow-Credentials', 'true', true);
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization', true);
            $response->headers->set('Access-Control-Allow-Methods', 'OPTIONS, GET, POST', true);
            $response->headers->set('Access-Control-Max-Age', 3600, true);
        }

        return $response;
    }

    private function processNormalQuery(Request $request, $schemaName = null)
    {
        return [];
//        $params = $this->requestParser->parse($request);
//
//        return $this->requestExecutor->execute($params, [], $schemaName)->toArray();
    }
}

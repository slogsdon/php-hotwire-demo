<?php declare(strict_types=1);

namespace Slogsdon\Hotwire\Turbo;

const CONTENT_TYPE_HEADER_NAME = 'Content-Type';

function respondAsTurboStream(array $requestHeaders = null): void
{
  if ($requestHeaders === null) {
    $requestHeaders = $_SERVER;
  }

  // Inspect the request's `Accept` header to ensure a Turbo stream is requested
  if (empty($requestHeaders['HTTP_ACCEPT']) || stristr($requestHeaders['HTTP_ACCEPT'], 'turbo-stream') === false) {
    return;
  }

  $contentType = sprintf('%s: %s', CONTENT_TYPE_HEADER_NAME, 'text/html');
  $responseHeaders = headers_list();

  foreach ($responseHeaders as $responseHeader) {
    if (stripos(strtolower($responseHeader), strtolower(CONTENT_TYPE_HEADER_NAME)) !== false) {
      $contentType = $responseHeader;
    }
  }
   
  header(sprintf('%s; turbo-stream', $contentType));
}

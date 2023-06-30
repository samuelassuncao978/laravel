<?php

return [
    "domain-locked" => ".lndo.site",
    "identification-method" => "domain", // domain || ip || manual
    "database-managed" => true, // true || false
    "division-method" => "database", // database || prefix || column
    "removal-delay" => "+30 days", // time string
    "use-silos" => true, // true || false
];

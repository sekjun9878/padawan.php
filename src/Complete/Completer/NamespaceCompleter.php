<?php

namespace Complete\Completer;

use Entity\Project;
use Entity\Completion\Context;
use Entity\Completion\Entry;

class NamespaceCompleter{
    public function getEntries(Project $project, Context $context){
        $entries = [];
        $postfix = trim($context->getPostfix());
        foreach($project->getIndex()->getFQCNs() AS $fqcn){
            $namespace = $fqcn->getNamespace();
            if(!empty($postfix) && strpos($namespace, $postfix) === false){
                continue;
            }
            $complete = str_replace($postfix, "", $namespace);
            $entries[$namespace] = new Entry($complete, "", "", $namespace);
        }
        $entries = array_values($entries);
        return $entries;
    }
}
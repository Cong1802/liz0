<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Taxonomy\Models\Taxon;
use Illuminate\Http\Request;

class TaxonSearchController
{
    public function __invoke(Request $request)
    {
        $query = Taxon::query()
            ->with(['ancestors' => function ($q) {
                $q->breadthFirst();
            }])
            ->whereNotNull('parent_id');
        if ($request->type) {
            if ($request->type == 'post_taxonomy') {
                $query = $query->whereTaxonomyId(setting('post_taxonomy', 1));
            }
            if ($request->type == 'product_taxonomy') {
                $query = $query->whereTaxonomyId(setting('product_taxonomy', 1));
            }
        }
        $taxons = $query->paginate();

        $taxons->getCollection()->transform(function ($taxon) {
            $result = [
                'id' => $taxon->id,
            ];
            $prettyName = '';
            if ($taxon->ancestors->isNotEmpty()) {
                foreach ($taxon->ancestors as $ancestor) {
                    $prettyName .= $ancestor->name.' -> ';
                }
            }
            $prettyName .= $taxon->name;
            $result['pretty_name'] = $prettyName;

            return $result;
        });

        return response()->json($taxons);
    }
}

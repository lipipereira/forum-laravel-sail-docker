<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Support\{
        CreateSupportDTO,
        UpdateSupportDTO
    };
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(
        protected SupportService $service
    ) {}

    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            page: $request->get('page',1),
            totalPerPage: $request->get('per_page',15),
            filter: $request->filter,
        );
        $filters = ['filter'=>$request->get('filter','')];

        return view('admin/supports/index',compact('supports','filters'));
    }

    public function show(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request)
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {
        if (!$support = $this->service->findOne($id)){
            return back();
        }
        return view('admin/supports.edit',compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string | int $id)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if (!$support) {
            return back();
        }

        // Serve para fazer inserção e Edição
        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();

        // $support->update($request->only([
        //     'subject','body'
        // ]));

        // $support->update($request->validated());
        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('supports.index');
    }
}

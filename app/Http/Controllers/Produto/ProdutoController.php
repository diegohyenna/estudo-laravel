<?php

namespace App\Http\Controllers\Produto;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\Produto\ProductFormRequest;

class ProdutoController extends Controller
{

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Product $product)
    {
        $produtos = $product->paginate(3);

        return view('produtos.index', compact('produtos'));
    }

    /**
     * @param Category $categories
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Category $categories)
    {
        $categorias = $categories->all();

        return view('produtos.create', compact('categorias'));
    }

    /**
     * @param Illuminate\Foundation\Http\FormRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductFormRequest $request, Product $product)
    {
        //somente
        // $request->only(["_token"]);
        
        //campo especifica
        // $request->input('nome');
        
        //exceto
        $newProduct = $request->except(["_token"]);

        //tratamento para o ativo, pois se nulo, o laravel nem manda o campo.
        $newProduct['ativo'] = isset($newProduct['ativo']) ? 1 : 0;

        //passa para o nome do campo no banco de dados
        $newProduct['categories_id'] = isset($newProduct['categorias']) ? $newProduct['categorias'] : null;

        //retira categorias pois não precisa dele
        unset($newProduct['categorias']);

        //antiga validação, antes de usar Illuminate\Foundation\Http\FormRequest
        // $this->validate($request, $product->rules, $product->messages);

        if($product->insert($newProduct)){
            $request->session()->flash('success', 'Produto salvo com sucesso!');
            return redirect()->route('produtos.index');
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Product $product)
    {
        $produto = $product->find($id);

        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Product $product, Category $categories)
    {
        $produto = $product->find($id);

        $categorias = $categories->all();

        return view('produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id, Product $product)
    {
        $product = $product->find($id);
        
        $updateProduct = $newProduct = $request->except(["_token"]);

        //tratamento para o ativo, pois se nulo, o laravel nem manda o campo.
        $updateProduct['ativo'] = isset($updateProduct['ativo']) ? 1 : 0;

        //passa para o nome do campo no banco de dados
        $updateProduct['categories_id'] = isset($updateProduct['categorias']) ? $updateProduct['categorias'] : null;

        //retira categorias pois não precisa dele
        unset($updateProduct['categorias']);

        if($product->update($updateProduct)){
            $request->session()->flash('success', 'Produto editado com sucesso!');
            return redirect()->route('produtos.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request, Product $product)
    {
        $product = $product->find($id);

        if($product->delete()){
            $request->session()->flash('success', 'Produto deletado com sucesso!');
            return redirect()->route('produtos.index');
        }else{
            return redirect()->back()->with(['errors' => "Falha ao deletar"]);
        }
    }
}

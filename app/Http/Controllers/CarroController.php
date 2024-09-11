<?php

namespace App\Http\Controllers;
use App\Models\Carro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarroController extends Controller
{

    public function dashboard()
    {
        // Recupera todos os carros do banco de dados
        $carros = Carro::all();

        // Passa os carros para a view de dashboard
        return view('dashboard', ['carros' => $carros]);
    }



    public function create(Request $req)
    {
        $carro = new Carro();
        $carro->modelo = $req->input('Modelo');
        $carro->marca = $req->input('Marca');
        $carro->ano = $req->input('Ano');
        $carro->cambio = $req->input('Cambio');
        $carro->ar_condicionado = $req->input('ArCondicionado'); // Compatível com o campo do form
        $carro->cor = $req->input('Cor');
        $carro->combustivel = $req->input('Combustivel');
        $carro->placa = $req->input('Placa');

        // Verificação e armazenamento da foto
        if ($req->hasFile('FotoCarro')) {
            if ($carro->Foto) {
                Storage::disk('public')->delete($carro->Foto);
            }
            $path = $req->file('FotoCarro')->store('veiculos', 'public');
            $carro->Foto = $path;
        }

        $carro->save();

        // Redireciona para a dashboard ou rota desejada
        return redirect()->route('dashboard')->with('success', 'Veículo cadastrado com sucesso!');
    }



    public function excluir(Request $req, $id){
        $carro = Carro::find($id);
        $carro->delete();
        return redirect()->route('dashboard')->with('success', 'Veículo cadastrado com sucesso!');
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function editar($id)
    {
        // Lógica para exibir o formulário de edição
        $carro = Carro::findOrFail($id);
        return view('editar', compact('carro'));
    }

    public function atualizar(Request $request, $id)
{
    // Obtenha o carro usando o ID
    $carro = Carro::findOrFail($id);

    // Atualize os campos com os valores do formulário
    $carro->marca = $request->input('Marca');
    $carro->ano = $request->input('Ano');
    $carro->cambio = $request->input('Cambio');
    $carro->ar_condicionado = $request->input('ArCondicionado');
    $carro->cor = $request->input('Cor');
    $carro->combustivel = $request->input('Combustivel');
    $carro->placa = $request->input('Placa');

    // Verifique se uma nova foto foi enviada e atualize-a
    if ($request->hasFile('FotoCarro')) {
        // Exclua a foto antiga se ela existir
        if ($carro->Foto) {
            Storage::disk('public')->delete($carro->Foto);
        }
        // Armazene a nova foto e atualize o caminho
        $path = $request->file('FotoCarro')->store('veiculos', 'public');
        $carro->Foto = $path;
    }

    // Salve as mudanças
    $carro->save();

    // Redirecione para a página de gerenciamento de carros com uma mensagem de sucesso
    return redirect()->route('dashboard')->with('success', 'Carro atualizado com sucesso!');
}
}


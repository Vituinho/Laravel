<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produtos | Painel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black text-white min-h-screen">

  <!-- Header -->
  <header class="p-6 flex justify-between items-center border-b border-zinc-700">
    <h1 class="text-2xl font-bold">📦 Produtos</h1>
    <a href="{{ route('produtos.create') }}" class="bg-emerald-500 hover:bg-emerald-600 px-4 py-2 rounded-lg font-semibold transition">+ Novo Produto</a>
  </header>

  @if (session('success'))
    <div class="alert alert-success text-center mt-4 w-25 mx-auto d-flex justify-content-center p-3" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
    </div>
  @endif
  
  @if (session('error')) 
    <div class="alert alert-danger text-center">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('error') }}
    </div>
  @endif

  <!-- Tabela -->
  <main class="p-6">
    <div class="overflow-x-auto rounded-xl shadow-lg">
      <table class="w-full text-left bg-zinc-900">
        <thead class="bg-zinc-800 text-zinc-300">
          <tr>
            <th class="p-4">Fornecedor</th>
            <th class="p-4">Nome</th>
            <th class="p-4">Descrição</th>
            <th class="p-4">Preço</th>
            <th class="p-4 text-right">Ações</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-zinc-800">
          @forelse ($produtos as $produto)
          <tr>
            <td class="p-4 font-medium">{{ $produto->usuario->nome ?? 'Sem Fornecedor' }}</td>
            <td class="p-4 font-medium">{{ $produto->nome }}</td>
            <td class="p-4">{{ $produto->descricao }}</td>
            <td class="p-4">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
            <td class="p-4 text-right align-middle">

              @if ($produto->id_usuario === auth()->user()->id)
              <div class="flex items-center justify-end gap-2">
                <a href="{{ route('produtos.edit', $produto->id) }}"
                  class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 rounded font-semibold text-black">
                  Editar
                </a>
                <form action="{{ route('produtos.destroy', $produto->id) }}"
                      method="POST"
                      class="m-0"
                      onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded font-semibold">
                    Deletar
                  </button>
                </form>
              </div>
              @endif

            </td>
          </tr>
          @empty
          <tr>
            <td colspan="12" class="p-6 text-center text-zinc-400">
              <div class="flex flex-col text-center">
                Nenhum produto cadastrado.
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>

  <!-- Modal Create/Edit -->
  <div id="modal" class="fixed inset-0 bg-black/70 hidden items-center justify-center">
    <div class="bg-zinc-900 p-6 rounded-xl w-full max-w-md shadow-xl">
      <h2 class="text-xl font-bold mb-4">Novo Produto</h2>
      <form class="space-y-4">
        <div>
          <label class="block text-sm text-zinc-400">Nome</label>
          <input type="text" class="w-full mt-1 p-2 rounded bg-zinc-800 border border-zinc-700" />
        </div>
        <div>
          <label class="block text-sm text-zinc-400">Preço</label>
          <input type="number" class="w-full mt-1 p-2 rounded bg-zinc-800 border border-zinc-700" />
        </div>
        <div>
          <label class="block text-sm text-zinc-400">Categoria</label>
          <input type="text" class="w-full mt-1 p-2 rounded bg-zinc-800 border border-zinc-700" />
        </div>
        <div class="flex justify-end gap-2 pt-4">
          <button type="button" class="px-4 py-2 rounded bg-zinc-700 hover:bg-zinc-600">Cancelar</button>
          <button class="px-4 py-2 rounded bg-emerald-500 hover:bg-emerald-600 font-semibold">Salvar</button>
        </div>
      </form>
    </div>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>

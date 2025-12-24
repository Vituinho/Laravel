<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Criar Produto</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black text-white min-h-screen flex items-center justify-center">

  <!-- Card -->
  <div class="w-full max-w-2xl bg-zinc-900 rounded-2xl shadow-2xl p-8">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold">📝 Produto</h1>
      <a href="/produtos" class="text-sm text-zinc-400 hover:text-white">← Voltar</a>
    </div>

    <!-- Form -->
    <form action="{{ route('produtos.store') }}" class="space-y-6" method="POST">
      @csrf
      
      <!-- Nome -->
      <div>
        <label class="block text-sm text-zinc-400">Nome do Produto</label>
        <input
          type="text"
          placeholder="Ex: Camiseta Preta"
          class="w-full mt-1 p-3 rounded-xl bg-zinc-800 border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-emerald-500"
          name="nome"
        />
      </div>

      <!-- Descrição -->
      <div>
        <label class="block text-sm text-zinc-400">Descrição</label>
        <textarea
          rows="4"
          placeholder="Descrição do produto..."
          class="w-full mt-1 p-3 rounded-xl bg-zinc-800 border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-emerald-500"
          name="descricao"
        ></textarea>
      </div>

      <!-- Preço -->
      <div>
        <label class="block text-sm text-zinc-400">Preço</label>
        <input
          type="number"
          step="0.01"
          placeholder="Ex: 59.90"
          class="w-full mt-1 p-3 rounded-xl bg-zinc-800 border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-emerald-500"
          name="preco"
        />
      </div>

      <!-- Actions -->
      <div class="flex justify-end gap-3 pt-6 border-t border-zinc-700">
        <a href="/produtos" class="px-5 py-3 rounded-xl bg-zinc-700 hover:bg-zinc-600 transition">Cancelar</a>
        <button class="px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 font-semibold transition">Salvar Produto</button>
      </div>

    </form>

  </div>

</body>
</html>

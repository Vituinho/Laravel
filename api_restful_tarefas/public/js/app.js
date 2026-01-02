async function deletarTarefa(id) {
    if (!confirm('Tem certeza que deseja excluir?')) return;

    const response = await fetch(`/api/tarefas/${id}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json'
        }
    });

    if (response.ok) {
        alert('Tarefa excluída com sucesso');
        location.reload(); // recarrega a lista
    } else {
        alert('Erro ao excluir');
    }
}

function PegarTarefa() {
    fetch('/api/tarefas')
        .then(res => res.json())
        .then(tarefas => {
            const tabela = document.getElementById('tabela');
            tabela.innerHTML = '';

            tarefas.forEach(tarefa => {
            
            let status = '';

            if (tarefa.concluida) {
                status = 'Concluida';
            } else {
                status = 'Inconcluida';
            }

            tabela.innerHTML += `
                <tr>
                    <td>${tarefa.id}</td>
                    <td>${tarefa.titulo}</td> 
                    <td>${status}</td>
                    <td>
                        <a class="btn btn-primary" href="/tarefas/${tarefa.id}/edit">Editar</a>
                        <button class="btn btn-danger" onclick="deletarTarefa(${tarefa.id})">Deletar</button>
                    </td>
                </tr>
            `;
        });
    });
}

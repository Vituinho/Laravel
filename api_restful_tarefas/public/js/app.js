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
                        <a class="btn btn-danger" href="/tarefas/${tarefa.id}/delete">Deletar</a>
                    </td>
                </tr>
            `;
        });
    });
}
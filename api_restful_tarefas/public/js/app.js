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
                </tr>
            `;
        });
    });
}
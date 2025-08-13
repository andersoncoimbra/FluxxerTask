<template>
  <div>
    <h2>Gerenciador de Tarefas</h2>

    <form @submit.prevent="createTask">
      <input v-model="newTaskTitle" type="text" placeholder="Nome da nova tarefa" required />
      <button type="submit">Adicionar Tarefa</button>
    </form>

    <ul>
      <li v-for="task in tasks" :key="task.id">
        <strong>{{ task.title }}</strong> - Status: {{ task.status }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'TaskList',
  data() {
    return {
      tasks: [],
      newTaskTitle: '',
      apiUrl: 'http://localhost:8000/api/tasks' // URL da API do Laravel
    };
  },
  mounted() {
    // Quando o componente é montado, busca a lista de tarefas
    this.fetchTasks();
  },
  methods: {
    fetchTasks() {
      axios.get(this.apiUrl)
        .then(response => {
          this.tasks = response.data;
        })
        .catch(error => {
          console.error("Erro ao buscar as tarefas:", error);
        });
    },
    createTask() {
      axios.post(this.apiUrl, { title: this.newTaskTitle })
        .then(response => {
          // Limpa o input do formulário
          this.newTaskTitle = '';
          // Atualiza a lista de tarefas sem recarregar a página
          this.fetchTasks();
          console.log("Tarefa criada com sucesso:", response.data);
        })
        .catch(error => {
          console.error("Erro ao criar a tarefa:", error);
        });
    }
  }
}
</script>

<style scoped>
/* Estilos básicos para o componente */
form {
  margin-bottom: 20px;
}
ul {
  list-style: none;
  padding: 0;
}
li {
  padding: 10px;
  border-bottom: 1px solid #ccc;
}
</style>
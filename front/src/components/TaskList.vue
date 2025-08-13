<template>
  <div class="container mt-5">
    <h2>Gerenciador de Tarefas</h2>

    <form @submit.prevent="createTask" class="mb-3">
      <div class="input-group">
        <input v-model="newTaskTitle" type="text" class="form-control" placeholder="Nome da nova tarefa" required />
        <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
      </div>
    </form>

    <ul class="list-group">
      <li v-for="task in tasks" :key="task.id" class="list-group-item d-flex justify-content-between align-items-center">
        <strong>{{ task.title }}</strong>
        <span :class="{'badge bg-primary': task.status === 'pending', 'badge bg-warning': task.status === 'processing', 'badge bg-success': task.status === 'done'}">
          {{ task.status }}
        </span>
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
      apiUrl: 'http://localhost:8000/api/tasks'
    };
  },
  mounted() {
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
          this.newTaskTitle = '';
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
/* Você ainda pode adicionar estilos específicos do componente aqui */
.badge {
  font-size: 0.8rem;
}
</style>
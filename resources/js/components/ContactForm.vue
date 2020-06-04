<template>
    <div class="form-contact">
        <transition name="fade" mode="out-in">
            <p v-if="sent">Tu mensaje ha sido recibido, te contactaremos pronto</p>
            <form v-else @submit.prevent="submit">
                <div class="input-container container-flex space-between">
                    <input v-model="form.name" placeholder="Tu nombre" class="input-name" required>
                    <input v-model="form.email" type="email" placeholder="Email" class="input-email" required>
                </div>
                <div class="input-container">
                    <input v-model="form.subject" placeholder="Asunto" class="input-subject" required>
                </div>
                <div class="input-container">
                    <textarea v-model="form.message" cols="30" rows="10" placeholder="Tu mensaje" required></textarea>
                </div>
                <div class="send-message">
                    <button class="text-uppercase c-green" :disabled="working">
                        <span v-if="working">enviando...</span>
                        <span v-else>enviar mensaje</span>
                    </button>
                </div>
            </form>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                sent: false,
                working: false,
                form: {
                    name: 'Luis Parrado',
                    email: 'luisprmat@example.com',
                    subject: 'Ayuda',
                    message: 'Necesito ayuda por favor',
                }
            }
        },
        methods: {
            submit() {
                this.working = true

                axios.post('/api/messages', this.form)
                    .then(res => {
                        this.sent = true
                        this.working = false
                        console.log(res.data)
                    })
                    .catch(err => {
                        this.sent = false
                        this.working = false
                        console.log(err.response.data)
                    })
            }
        }
    }
</script>

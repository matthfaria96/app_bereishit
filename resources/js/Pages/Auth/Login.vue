<template>
    <Head title="Entrar" />

    <BreezeValidationErrors class="mb-4" />

    <div v-if="result" class="mb-4 font-medium text-sm text-green-600">
        {{ result }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <BreezeLabel for="email" value="Email" />
            <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <BreezeLabel for="password" value="Senha" />
            <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <BreezeButton class="ml-4" :class="{ 'opacity-25': processing }" :disabled="processing">
                Entrar
            </BreezeButton>
        </div>
    </form>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            result: '',
            form: {
                email: '',
                password: '',
                remember: false
            },
            processing: false
        }
    },

    methods: {
        submit() {
            this.processing = true;
            window.axios.post(this.route('login'), this.form).then(response => {
                if(response.data.status === 'success') {
                    window.location = '/web/dashboard'
                }
            }).catch((response) => {
                this.processing = false;
                this.result = 'Falha ao realizar login, dados de acesso incorretos.'
            })

        }
    }
}
</script>

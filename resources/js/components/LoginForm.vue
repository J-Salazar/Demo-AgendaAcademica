<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
            <b-form @submit="onSubmit">
                <span class="text-hide">{{ csrf }}</span>
                <b-form-group
                    id="exampleInputGroup1"
                    label="Correo electrónico:"
                    label-for="email"
                    description="Tu dirección de correo no será compartida con nadie más."
                >
                    <b-form-input
                        id="email"
                        type="email"
                        v-model="form.email"
                        name="email"
                        required
                        placeholder="Ingrese su e-mail" />

                    <label for="password">Contraseña</label>
                    <b-input id="password" name="password" v-model="form.password" type="password"
                             aria-describedby="passwordHelpBlock" />
                    <b-form-text id="passwordHelpBlock">
                        Tu contraseña debe tener un mínimo de 6 caracteres.
                    </b-form-text>
                </b-form-group>


                <b-button class="position-absolute float-right" type="submit" variant="primary">Iniciar Sesión</b-button>
            </b-form>
            </div>
            <div class="col-md-6">
                {{$data}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                resp:[],
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },
        methods: {
            onSubmit() {
                // evt.preventDefault()
                axios.post('/user/login'
                            ,{email:this.form.email,
                            password:this.form.password}).then(
                    (response) => {console.log(response);}
                )
            }
        }
    }
</script>

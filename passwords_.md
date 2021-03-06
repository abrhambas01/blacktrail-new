```html
<div id="app" v-cloak>

	<h2>Password</h2>
	
	<div class="password">
		<input :class='{valid:passwordValidation.valid}' :type="passwordVisible ? 'text' : 'password'" v-model="password">
		<button class="visibility" tabindex='-1' @click='togglePasswordVisibility' :arial-label='passwordVisible ? "Hide password" : "Show password"'>
			<i class="material-icons">{{ passwordVisible ? "visibility" : "visibility_off" }}</i>
		</button>
	</div>

	<input type="password" v-model.lazy='checkPassword'>

	<transition name="hint" appear>
		<div v-if='passwordValidation.errors.length > 0 && !submitted' class='hints'>
			<h2>Hints</h2>
			<p v-for='error in passwordValidation.errors'>{{error}}</p>
		</div>
	</transition>
	
	<div class="matches" v-if='notSamePasswords'>
		<p>Passwords don't match.</p>
	</div>

	<button @click='resetPasswords' v-if='passwordsFilled && !notSamePasswords && passwordValidation.valid'>
		Submit
	</button>
	
</div>
```

```scss
$bgColor:#3A81C8;
$color:#D4DEDF;

body {
	padding:1em;
	background-color:$bgColor;
	color:$color;
}

[v-cloak] {
	opacity:0;
}

#app {
	max-width:600px;
	margin: 0 auto;
}

.hints {
	max-width:400px;
	padding:1em;
	background:whitesmoke;
	margin: 1em 0;
	font-size: .9em;
	color:darken(#D4DEDF, 50%);
	h2 {
		margin: .5em 0 .2em 0;
	}
	p {
		margin: 0;
		padding-left:1em;
		&::before {
			content:">";
			font-size:.9em;
			margin-right:6px;
			display:inline-block;
		}
	}
}

.visibility {
	all:unset;
	background:whitesmoke;
	display:inline-block;
	color:$bgColor;
	padding:2px .4em 0;
	vertical-align:center;
}

.material-icons {
	font-size: 1.5em;
}
.password {
	display:flex;
	align-items:center;
}

input, button {
	padding:6px;
}
input + button {
	font-size: .85em;
}
[type=password], [type=text] {
	color:#D4DEDF;
	border:1px solid transparent;
	background:darken(#3A81C8, 5%);
	margin:6px 10px 6px 0;
	&.valid {
		border:1px solid whitesmoke;
	}
}
[type=password] {
	letter-spacing:.2em;
}

.hint {
	&-enter {
		opacity:0;
		transform:translate3d(-20px,0,0);
	}
	&-leave-to {
		opacity:0;
		transform:translate3d(0, 20px, 0);
	}
	&-enter-active {
		transition:300ms;
	}
	&-leave-active {
		transition:400ms;
	}
}

```
```js
const app = new Vue({
	el:"#app",
	data () {
		return {
			rules: [
				{ message:'One lowercase letter required.', regex:/[a-z]+/ },
				{ message:"One uppercase letter required.",  regex:/[A-Z]+/ },
				{ message:"8 characters minimum.", regex:/.{8,}/ },
				{ message:"One number required.", regex:/[0-9]+/ }
			],
			password:'',
			checkPassword:'',
			passwordVisible:false,
			submitted:false
		}
	},
	methods: {
		resetPasswords () {
			this.password = ''
			this.checkPassword = ''
			this.submitted = true
			setTimeout(() => {
				this.submitted = false
			}, 2000)
		},
		togglePasswordVisibility () {
			this.passwordVisible = !this.passwordVisible
		}	
	},
	computed: {
		notSamePasswords () {
			if (this.passwordsFilled) {
				return (this.password !== this.checkPassword)
			} else {
				return false
			}
		},
		passwordsFilled () {
			return (this.password !== '' && this.checkPassword !== '')
		},
		passwordValidation () {
			let errors = []
			for (let condition of this.rules) {
				if (!condition.regex.test(this.password)) {
					errors.push(condition.message)
				}
			}
			if (errors.length === 0) {
				return { valid:true, errors }
			} else {
				return { valid:false, errors }
			}
		}
	}
})
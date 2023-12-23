<template>
	<header>
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
		  <div class="container">
		    <router-link to="/" class="navbar-brand">Booking System</router-link>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		        	<router-link to="/" class="nav-link">Home</router-link>
		        </li>
		        <li class="nav-item">
		        	<router-link to="/create" class="nav-link">Create Booking</router-link>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</header>
	<router-view />
</template>

<script>
	export default {
		name: "App",
	}
</script>
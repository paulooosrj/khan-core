<?php
	
	namespace StrategysAuth;

	class strategyName {

		// Table mysql using
		const table = "login";

		// Route logout
		const logout = "./login";

		// Ignore key init session
		const ignoreSession = ["password"];

		const login = [
			// fields POST and COLUMNS
			"email", "password"
		];

		const register = [
			// fields POST and COLUMNS
			"email", "password", "name"
		];

	}

<script setup lang="ts">

</script>

<template>
      <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
          <header>
              <a href="#">
                  <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/full-logo.svg" alt="">
              </a>
          </header>

          <main class="mt-8">
              <h2 class="text-gray-700 dark:text-gray-200">Hi Olivia,</h2>

              <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                  Alicia has invited you to join the team on <span class="font-semibold ">Meraki UI</span>.
              </p>

              <button
                  class="px-6 py-2 mt-4 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                  Accept the invite
              </button>

              <p class="mt-8 text-gray-600 dark:text-gray-300">
                  Thanks, <br>
                  Meraki UI team
              </p>
          </main>


          <footer class="mt-8">
              <p class="text-gray-500 dark:text-gray-400">
                  This email was sent to <a href="#" class="text-teal-600 hover:underline dark:text-blue-400"
                                            target="_blank">contact@merakiui.com</a>.
                  If you'd rather not receive this kind of email, you can <a href="#"
                                                                             class="text-blue-600 hover:underline dark:text-blue-400">unsubscribe</a> or <a href="#"
                                                                                                                                                            class="text-blue-600 hover:underline dark:text-blue-400">manage your email preferences</a>.
              </p>

              <p class="mt-3 text-gray-500 dark:text-gray-400">© 2025 Meraki UI. All Rights Reserved.</p>
          </footer>
      </section>
</template>

<style scoped>
body {
    margin: 0;
    padding: 0;
    background-color: #f9fafb;
    color: #374151;
    font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

section {
    max-width: 42rem; /* max-w-2xl */
    margin-left: auto;
    margin-right: auto;
    background-color: #ffffff; /* bg-white */
    padding: 2rem 1.5rem; /* py-8 px-6 */
    box-sizing: border-box;
}

header img {
    height: 2rem; /* h-8 */
    width: auto;
    display: block;
}

h2 {
    color: #374151; /* text-gray-700 */
    font-size: 1.25rem;
    line-height: 1.75rem;
    font-weight: 600;
    margin: 2rem 0 0.5rem 0;
}

p {
    font-size: 1rem;
    line-height: 1.75;
    margin: 0.5rem 0 0 0;
    color: #4b5563; /* text-gray-600 */
}

p span.font-semibold {
    font-weight: 600;
}

button {
    display: inline-block;
    padding: 0.5rem 1.5rem; /* py-2 px-6 */
    margin-top: 1rem;
    font-size: 0.875rem; /* text-sm */
    font-weight: 500;
    letter-spacing: 0.05em; /* tracking-wider */
    text-transform: capitalize;
    background-color: #2563eb; /* bg-blue-600 */
    color: #ffffff;
    border: none;
    border-radius: 0.5rem; /* rounded-lg */
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

button:hover {
    background-color: #3b82f6; /* hover:bg-blue-500 */
}

button:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(147, 197, 253, 0.5); /* focus:ring-blue-300 focus:ring-opacity-80 */
}

footer {
    margin-top: 2rem;
}

footer p {
    color: #6b7280; /* text-gray-500 */
    font-size: 0.875rem;
    line-height: 1.5;
}

footer a {
    color: #2563eb; /* text-blue-600 */
    text-decoration: none;
}

footer a:hover {
    text-decoration: underline;
}

footer p + p {
    margin-top: 0.75rem; /* mt-3 */
}

</style>

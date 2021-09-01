<template>
    <div class="AddLinkForm">
        <div class="columns is-centered">
            <div class="column is-three-fifths is-10-touch is-offset-1-touch">

                <div class="field">
                    <label class="label has-text-centered is-size-4" for="long-url">Enter your long URL here:</label>
                    <div class="control">
                        <input class="input is-medium" id="long-url" name="long_url" type="url" placeholder="Long URL"
                               autocomplete="off" required v-model="url"
                               v-on:keyup.enter="addLink()">
                    </div>
                </div>

                <div class="field is-grouped is-grouped-centered">
                    <p class="control">
                        <label class="label has-text-centered is-size-4" for="long-url">and click</label>
                        <button class="button is-medium"
                                @click="addLink()"
                                :class="[ isUrlValid ? 'is-primary' : '', im_thinking ? 'is-loading' : '']"
                                :disabled="!isUrlValid">
                            Shortify it!
                        </button>
                    </p>
                </div>

                <div class="field result is-grouped is-grouped-centered mt-6"
                     :class="[ short_url ? '' : 'is-invisible' ]">
                    <p class="control">
                        <label class="label has-text-centered is-size-4" for="long-url">here you go!</label>
                        <a target="_blank" :href="short_url">{{ short_url }}</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
  data: function () {
    return {
      url: "",
      short_url: "",
      im_thinking: false
    }
  },
  computed: {
    isUrlValid() {
      return new RegExp( "^(https?:\\/\\/){1}([\\da-z\\.-]+\\.[a-z\\.]{2,6}|[\\d\\.]+)([\\/:?=&#]{1}[\\da-z\\.-]+)*[\\/\\?]?$").test(this.url);
    },
  },
  methods: {
    addLink() {
      if (this.url === '') {
        return;
      }

      this.im_thinking = true;
      this.short_url = '';

      axios.post('/api/link/store', {
        url: this.url
      })
        .then(response => {
          this.im_thinking = false;
          if (response.data.success === true) {
            this.short_url = response.data.short_url;
            this.url = '';
          }
        })
        .catch(error => {
          this.im_thinking = false;
          console.log(error);
        })
    }
  }
}
</script>

<style scoped>
.result {
    transition: opacity .3s ease-out;
    opacity: 1;
    pointer-events: auto;
}

.result.is-invisible {
    opacity: 0;
    pointer-events: none;
}
</style>
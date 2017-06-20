<script>
  (function () {
    'use strict';

    const selectors = function (getState) {
      const state = () => getState().<%= model %>;

      let exposableProps = [
        '<%= model %>',
        'foo',
        'bar',
        'baz'
      ];

      let getters = {
        get <%= model %>() {
          let { <%= model %> } = state();
          return <%= model %>;
        }

        get foo() {
          let { foo } = state();
          return foo;
        },

        get bar() {
          let { bar } = state();
          return bar;
        },

        get baz() {
          let { baz } = state();
          return baz;
        }
      }

      exposableProps.forEach(
        prop => Object.defineProperty(getters, prop, { get: () => state()[prop] })
      );

      return getters;
    }

    window.Selectors = window.Selectors || {};
    window.Selectors.<%= model_Capitalize %> = selectors;
  })();

</script>

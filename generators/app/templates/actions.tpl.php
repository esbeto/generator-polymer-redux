<link rel="import" href="./selectors.html">
<link rel="import" href="../utils.html">
<link rel="import" href="../base-api.html">

<script>
  (function () {
    'use strict';

    const init = function (dispatch) {
      actions.fetch<%= model_Capitalize %> = function () {
        return function (dispatch, getState) {
          let { requested, success, error } = Utils.thunkActionFactory('FETCH_<%= model_UPPERCASE %>', dispatch);

          requested();
          return Api.get('/<%= model %>/')
            .then(response => response.data.data)
            .then(data => success(data))
            .catch(err => error(err));
        }
      }

      return Redux.bindActionCreators(actions, dispatch);
    }

    window.ActionCreators = window.ActionCreators || {};
    window.ActionCreators.<%= model_Capitalize %> = init;
  })();

</script>

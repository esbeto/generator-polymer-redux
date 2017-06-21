<script>
  <%= model %> = function() {
    const initialState = {
      <%= model %>Id: null,
      <%= model %>: {},
      foo: 'bar',
      loading: false,
      error: {}
    }

    return (state = initialState, action) => {
      switch (action.type) {
        case 'FETCH_<%= model_UPPERCASE %>':
          return Object.assign({}, state, {
            <%= model %>Id: action.<%= model %>Id,
            <%= model %>: Object.assign({}, state.<%= model %>, {
              foo: action.foo,
              bar: action.bar
            }),
            loading: true,
          });
        case 'FETCH_<%= model_UPPERCASE %>:SUCCESS':
          return Object.assign({}, state, {
            <%= model %>: action.<%= model %>,
            loading: false,
          });
        case 'FETCH_<%= model_UPPERCASE %>:ERROR':
          return Object.assign({}, state, {
            loading: false,
            error: action.error
          });
        case 'SIMPLE_ACTION':
          return Object.assign({}, state, {
            foo: action.bar
          });
        case 'RESET_STATE':
          return Object.assign({}, initialState);
        default:
          return state;
      }
    }
  }

</script>

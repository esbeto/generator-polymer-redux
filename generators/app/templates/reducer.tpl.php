<script>
  <%= model %> = function() {
    const initialState = {
      <%= model %>Id: null,
      <%= model %>: {},
      loading: false,
      success: false,
      error: {}
    }

    return (state = initialState, action) => {
      switch (action.type) {
        case 'FETCH_<%= model_UPPERCASE %>':
          return Object.assign({}, state, {
            <%= model %>Id: action.<%= model %>Id,
            <%= model %>: Object.assign({}, state.<%= model %>, {
              foo: action.foo,
              cover: action.cover
            }),
            loading: true,
          });
        case 'FETCH_<%= model_UPPERCASE %>_SUCCESS':
          return Object.assign({}, state, {
            <%= model %>: action.<%= model %>,
            loading: false,
            success: true
          });
        case 'FETCH_<%= model_UPPERCASE %>_ERROR':
          return Object.assign({}, state, {
            loading: false,
            success: false,
            error: action.error
          });
        default:
          return state;
      }
    }
  }
</script>

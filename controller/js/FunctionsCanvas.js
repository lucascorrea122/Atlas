function main(container) {
    var ports;
    var graph;
    makeBezierCurve();

    mxEvent.disableContextMenu(document.body);
    graph = new mxGraph(container);


    style = graph.getStylesheet().getDefaultEdgeStyle();
    style[mxConstants.STYLE_ENDARROW] = mxConstants.d;
    style[mxConstants.STYLE_STROKECOLOR] = 'black';


    mxStyleRegistry.putValue('roundedStyle', mxEdgeStyle.MyStyle);


    graph.setConnectable(true);
    graph.setPortsEnabled(false);


    ports = new Array();
    ports['n'] = {
        x: 0.5,
        y: 0,
        perimeter: true,
        constraint: 'north'
    };
    ports['s'] = {
        x: 0.5,
        y: 1,
        perimeter: true,
        constraint: 'south'
    };


    mxShape.prototype.getPorts = function () {
        return ports;
    };

    graph.connectionHandler.isConnectableCell = function (cell) {
        return false;
    };
    mxEdgeHandler.prototype.isConnectableCell = function (cell) {
        return graph.connectionHandler.isConnectableCell(cell);
    };

    mxGraphHandler.prototype.moveEnabled = false;
    // Disables existing port functionality
    graph.view.getTerminalPort = function (state, terminal, source) {
        return terminal;
    };

    graph.getConnectionConstraint = function (edge, terminal, source) {
        var key = (source) ? mxConstants.STYLE_SOURCE_PORT : mxConstants.STYLE_TARGET_PORT;
        var id = edge.style[key];

        if (id != null) {
            var c = new mxConnectionConstraint(null, null);
            c.id = id;

            return c;
        }

        return null;
    };

    graphGetConnectionPoint = graph.getConnectionPoint;
    graph.getConnectionPoint = function (vertex, constraint) {
        if (constraint.id != null && vertex != null && vertex.shape != null) {
            var port = vertex.shape.getPorts()[constraint.id];

            if (port != null) {
                constraint = new mxConnectionConstraint(new mxPoint(port.x, port.y), port.perimeter);
            }
        }

        return graphGetConnectionPoint.apply(this, arguments);
    };


    rubberband = new mxRubberband(graph);

    grafo = new Graph(graph);
    grafo.model.container.style.backgroundColor = 'white';
    layout = new mxCompactTreeLayout(grafo.model, false);

    var parent = grafo.model.getDefaultParent();
    createStyles();


    grafo.model.centerZoom = false;

    graph.addListener(mxEvent.DOUBLE_CLICK, function (sender, evt) {
        var cell = evt.getProperty('cell');
        if (cell.isVertex() == true) {
            grafo.renameFeature(cell);
            evt.consume();
        }

    });


    document.body.appendChild(mxUtils.button('View XML', function () {
        var encoder = new mxCodec();
        var node = encoder.encode(graph.getModel());
        mxUtils.popup(mxUtils.getXml(node), true);
    }));

    undoManager = new mxUndoManager();
    var listener = function (sender, evt) {
        undoManager.undoableEditHappened(evt.getProperty('edit'));
    };
    grafo.model.getModel().addListener(mxEvent.UNDO, listener);
    grafo.model.getView().addListener(mxEvent.UNDO, listener);


    var mxCellRendererInstallCellOverlayListeners = mxCellRenderer.prototype.installCellOverlayListeners;
    mxCellRenderer.prototype.installCellOverlayListeners = function (state, overlay, shape) {
        mxCellRendererInstallCellOverlayListeners.apply(this, arguments);
        var graph = state.view.graph;

        mxEvent.addGestureListeners(shape.node,
            function (evt) {
                graph.fireMouseEvent(mxEvent.MOUSE_DOWN, new mxMouseEvent(evt, state));
            },
            function (evt) {
                graph.fireMouseEvent(mxEvent.MOUSE_MOVE, new mxMouseEvent(evt, state));
            },
            function (evt) {
                if (mxClient.IS_QUIRKS) {
                    graph.fireMouseEvent(mxEvent.MOUSE_UP, new mxMouseEvent(evt, state));
                }
            });

        if (!mxClient.IS_TOUCH) {
            mxEvent.addListener(shape.node, 'mouseup', function (evt) {
                overlay.fireEvent(new mxEventObject(mxEvent.CLICK,
                    'event', evt, 'cell', state.cell));
            });
        }
    };


    mxEvent.addMouseWheelListener(function (evt, up) {
        if (!mxEvent.isConsumed(evt)) {
            if (up) {
                grafo.model.zoomIn();
            } else {
                grafo.model.zoomOut();
            }

            mxEvent.consume(evt);
        }
    });

    // Configures automatic expand on mouseover
    graph.popupMenuHandler.autoExpand = true;

    // Installs context menu
    graph.popupMenuHandler.factoryMethod = function (menu, cell, evt) {
        if (cell != null) {
            if (grafo.model.getModel().isVertex(cell)) {
                menu.addItem('Make Mandatory', null, function () {
                    changeTypeFeature([cell], 'mandatory');
                });

                menu.addItem('Make Optional', null, function () {
                    changeTypeFeature([cell], 'optional');
                });

                menu.addItem('Make Alternative', null, function () {
                    changeTypeFeature([cell], 'alternative');
                });

                menu.addItem('Remove Feature', null, function () {
                    grafo.removeFeature([cell]);

                });
            }
        } else {
            menu.addItem('Create Feature', null, function () {
                showPopUp(modalFeature);
            });

            menu.addItem('Create Association', null, function () {
                showPopUp(modalAssociation);
            });
        }
    };
    adjustSizes();
    adjustTooltips();
};